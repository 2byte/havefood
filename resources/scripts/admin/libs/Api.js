import axios from 'axios'
import { config } from 'dotenv'

config();

export class Api {
    
    apiTestServer = null
    apiAdminRoutes = [
      '/api/gov/different/get-goods-types',
      '/api/gov/file/upload',
      '/api/gov/categories/index',
      '/api/gov/categories/store',
      '/api/gov/goods/store',
      '/api/gov/goods/get',
      '/api/gov/goods/option/get',
      '/api/gov/goods/option/store',
      '/api/local/auth-boss',
      '/sanctum/csrf-cookie',
    ]
    request = Promise.resolve()
    requestUrl = null
    methodRequest = 'get'
    methodApi = null
    requetSendForm = null
    axiosParams = {}
    axiosInstance = null
    completeCallback = null
    successCallback = null
    failCallback = null
    
    refObjectErrors = null
    refLoader = null
    
    constructor({
        url = null,
        methodRequest = 'get',
        formParams = null,
        axiosParams = {},
        axiosInstance = null
    }) {
      
      this.requestUrl = url
      this.methodRequest = methodRequest;
      this.requestSendForm = formParams
      this.axiosParams = axiosParams
      
      if (process?.env?.TEST == 'true') {
        this.apiTestServer = process.env.APP_URL
        this.axiosParams.baseURL = this.apiTestServer.replace('localhost', '127.0.0.1')
      } else {
        this.axiosParams.baseURL = '/'
      }
      
      if (Object.keys(axiosParams).length) {
        Object.assign(this.axiosParams, axiosParams)
      }
      
      this.axiosInstance = axiosInstance || axios.create(this.axiosParams)
    }
    
    setAxiosInstance(inst) {
      return this.axiosInstance = inst
    }
    
    run() {
      this.makeRequest({
        url: this.requestUrl, 
        methodRequest: this.methodRequest, 
        formParams: this.requestSendForm
      })
      return this
    }
    
    makeUrl(url) {
      return this.apiAdminRoutes.find((route) => route.includes(url))
    }
    
    makeRequest({url, methodRequest, formParams = null}) {
      
        const propSend = this.methodRequest.toLowerCase() == 'get'
          ? 'params' 
          : 'data';
      
        let axiosParams = {
            method: methodRequest,
            url: this.makeUrl(url),
            [propSend]: formParams,
        }
        if (Object.keys(this.axiosParams).length) {
          Object.assign(axiosParams, this.axiosParams)
        }
        
        this.request = this.axiosInstance.request(axiosParams)
            .then((response) => {
                if (response.data.success && this.successCallback) {
                  this.successCallback(response.data.data)
                }
                if (this.completeCallback) {
                  this.completeCallback(response.data.success, response.data.data)
                }
                if (this.refLoader) {
                  this.refLoader.value = false;
                }
            })
            .catch((err) => {
              if (err?.response?.status == 422) {
                if (this.completeCallback) {
                  this.completeCallback(false, err.response.data)
                }
                
                if (this.refObjectErrors) {
                  this.refObjectErrors.value = err.response.data
                }
                
                if (this.refLoader) {
                  this.refLoader.value = false
                }
                return true
              }
              
              if (err.response) {
                this.failCallback(
                    new Error(`Invalid response for request ${axiosParams.url} method ${axiosParams.method} params ${JSON.stringify(axiosParams.params) ?? '[]'}, response ${JSON.stringify(err.response?.data ?? [])} code: ${err.response.status}`)
                )
              } else {
                throw err;
              }
              
            })
      
        return this
    }
    
    getAxiosInstance() {
      return this.axiosInstance
    }
    
    setErrors(refObject) {
      this.refObjectErrors = refObject
      return this
    }
    
    setLoader(refSwitcher) {
      this.refLoader = refSwitcher
      return this
    }
    
    success(cb) {
      this.successCallback = cb
      return this
    }
    
    complete(cb) {
        this.completeCallback = cb
        return this
    }
    
    fail(cb) {
        this.failCallback = cb
        return this
    }
    
    getPromise() {
      return this.request
    }
    
    static async authenticatedBoss() {

      const api = new Api({
        url: '/sanctum/csrf-cookie', 
        methodRequest: 'get', 
        axiosParams: { withCredentials: true, timeout: 2000 }
      })
      
      await api.run().getPromise()
      
      await api.makeRequest({url: '/api/local/auth-boss'}).getPromise()
      
      createRequestApi.axiosInstance = api.getAxiosInstance()
      
      return createRequestApi
    }
}

function createRequestApi(url, methodRequest, formParams) {
    if (!createRequestApi.axiosInstance) {
      createRequestApi.axiosInstance = null
    }
    
    const instApi = new Api({
        url,
        methodRequest,
        formParams,
        axiosInstance: createRequestApi.axiosInstance
    })
    
    instApi.fail((err) => {
      
      if (process?.env?.TEST != 'true') {
        alert(err);
      } else {
        if (process?.env?.APP_DEBUG) {
          console.log('error request api', err)
        }
      }
    });
    
    return instApi.run();
}

export const sendFile = function createRequestApiSendFile(url, fields) {
  
  const instApi = new Api({
    url: url,
    methodRequest: 'post',
    formParams: fields,
    axiosParams: {
      headers: { 'Content-Type': 'multipart/form-data' },
      onUploadProgress: (ev) => {}
    }
  })
  
  return instApi.run()
}

export default createRequestApi