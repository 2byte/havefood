import axios from 'axios'
import { config } from 'dotenv'

if (process.env.TEST == 'true') {
  config();
}

export class Api {
    
    apiTestServer = null
    apiAdminRoutes = [
      '/api/gov/different/get-goods-types',
      '/api/gov/categories',
      '/api/gov/categories/store',
      '/api/gov/goods/store',
      '/api/gov/goods/get',
      '/api/gov/goods/option/get',
      '/api/gov/goods/option/store',
      '/api/gov/file/upload',
      '/api/gov/file/get/previews',
      '/api/gov/file/delete',
      '/api/local/auth-boss',
      '/api/local/get-samples-images',
      '/sanctum/csrf-cookie',
    ]
    request = null
    requestUrl = null
    methodRequest = 'get'
    methodApi = null
    requetSendForm = null
    axiosParams = {
      env: { FormData: window.FormData }
    }
    axiosInstance = null
    completeCallback = null
    successCallback = null
    failCallback = null
    uploadProgressCallback = null
    
    setWithRightBoss = false
    isAuthBoss = false
    
    refObjectErrors = null
    refLoader = null
    
    constructor({
        url = null,
        methodRequest = 'get',
        formParams = null,
        axiosParams = {},
        axiosInstance = null,
    }) {
      
      this.requestUrl = url
      this.methodRequest = methodRequest
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
    
    middlewareRunnerRequest() {
      if (this.setWithRightBoss && !this.isAuthBoss) {
        return Api.makeAuthBoss().then((apiBoss) => {
          
          this.setIsAuthBoss();
          this.axiosInstance = apiBoss.getAxiosInstance();
          
          return apiBoss
        }).catch((err) => {
          console.dir(err)
          console.error('Error request with the right boss', err)
        })
      } else {
        return Promise.resolve()
      }
    }
    
    run() {
      return this.middlewareRunnerRequest().then(() => {
        
        return this.makeRequest({
          url: this.requestUrl, 
          methodRequest: this.methodRequest, 
          formParams: this.requestSendForm
        })
      })
    }
    
    makeUrl(url) {
      return this.apiAdminRoutes.find((route) => route.includes(url)) ?? url
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
                  let returnData = []
                  
                  if (response.data.success && response.data.data) {
                    returnData = [response.data.success, response.data.data]
                  } else if (response.data instanceof Blob) {
                    returnData = [true, response.data]
                  } 
                  
                  this.completeCallback(...returnData)
                }
                if (this.refLoader) {
                  this.refLoader.value = false;
                }
              return response
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
                throw new Error('Error Api.makeRequest with ' + JSON.stringify(axiosParams) + ' err: ' + err.message, err.stack);
              }
              
            })
      
        return this.request
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
    
    onUploadProgress(cb) {
      this.axiosParams.onUploadProgress = cb
      return this
    }
    
    getPromise() {
      return this.request
    }
    
    withRightBoss(flag = true) {
      this.setWithRightBoss = flag
      return this
    }
    
    setIsAuthBoss(flag = true) {
      this.isAuthBoss = flag
      return this
    }
    
    static async makeAuthBoss() {
      try {
        const api = new Api({
          url: '/sanctum/csrf-cookie', 
          methodRequest: 'get', 
          axiosParams: { withCredentials: true }
        })
        
        await api.run()
        
        await api.makeRequest({methodRequest: 'get', url: '/api/local/auth-boss'})
        
        return api
      } catch (err) {
        console.error('Error getting the right a boss', err)
      }
    }
    
    static async authenticatedBoss() {
      const apiInst = await Api.makeAuthBoss()
      
      createRequestApi.axiosInstance = apiInst.getAxiosInstance()
      
      return createRequestApi
    }
}

function createRequestApi(url, methodRequest, formParams, axiosParams) {
    if (!createRequestApi.axiosInstance) {
      createRequestApi.axiosInstance = null
    }
    if (!createRequestApi.withoutRun) {
      createRequestApi.withoutRun = true
    }
    if (!createRequestApi.withRightBoss) {
      createRequestApi.withRightBoss = false
    }
    
    const instApi = new Api({
        url,
        methodRequest,
        formParams,
        axiosInstance: createRequestApi.axiosInstance,
        axiosParams
    })
    
    if (createRequestApi.withRightBoss) {
      instApi.withRightBoss()
    }
    
    instApi.fail((err) => {
      if (process?.env?.TEST != 'true') {
        alert(err);
      } else {
        if (process?.env?.APP_DEBUG) {
          console.log('error request api', err)
        }
      }
    });
    
    if (createRequestApi.withoutRun) {
      return instApi
    } else {
      return instApi.run()
    }
}

export const sendFile = function createRequestApiSendFile(url, fields) {
  
  const createRequestApiArgs = [
    url,
    'post',
    fields,
    {
      headers: { 'Content-Type': 'multipart/form-data' },
    }
  ]
  
  createRequestApi.withoutRun = true
  
  const instApi = createRequestApi(...createRequestApiArgs)
  
  if (process?.env?.TEST == 'true') {
    instApi.withRightBoss()
  }
  
  return instApi
}

export default createRequestApi