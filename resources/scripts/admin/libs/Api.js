import axios from 'axios'

export class Api {
    
    apiBaseUrl = '/api/gov'
    request = Promise.resolve()
    methodRequest = 'get'
    method = null
    requestData = null
    completeCallback = null
    successCallback = null
    failCallback = null
    
    refObjectErrors = null
    refLoader = null
    
    constructor({
        run = false,
        method = null,
        methodRequest = 'get',
        params = null
    }) {
      
      this.method = method
      this.methodRequest = methodRequest;
      this.requestData = params
      
    }
    
    run() {
      this.makeRequest(this.method, this.methodRequest, this.requestData)
      return this
    }
    
    makeUrl(method) {
        return `${this.apiBaseUrl}/${method}`
    }
    
    makeRequest(method, methodRequest, params) {
      
        const propSend = this.methodRequest.toLowerCase() == 'get'
          ? 'params' 
          : 'data';
      
        let axiosParams = {
            method: methodRequest,
            url: this.makeUrl(method),
            [propSend]: params,
        }
        
        this.request = axios(axiosParams)
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
}

function createRequestApi(method, methodRequest, params) {
    
    const instApi = new Api({
        method,
        methodRequest,
        params
    })
    
    instApi.fail((err) => {
      alert(err);
    });
    
    return instApi.run();
}

export default createRequestApi