import axios from 'axios'

export class Api {
    
    apiBaseUrl = '/api/gov'
    request = Promise.resolve()
    methodRequest = 'get'
    method = null
    completeCallback = null
    failCallback = null
    
    constructor({
        run = false,
        method = null,
        methodRequest = 'get',
        params = null
    }) {
      
      this.method = method
      this.methodRequest = methodRequest;
      
      if (run) {
        this.makeRequest(this.method, methodRequest, params)
      }
    }
    
    makeUrl(method) {
        return `${this.apiBaseUrl}/${method}`
    }
    
    makeRequest(method, methodRequest, params) {
        let axiosParams = {
            method: methodRequest,
            url: this.makeUrl(method),
            data: params
        }
        
        this.request = axios(axiosParams)
            .then((response) => {
                this.completeCallback(response.data.success, response.data.data)
            })
            .catch((err) => {
                this.failCallback(
                    new Error(`Invalid response for request ${axiosParams.url} method ${axiosParams.method} params ${axiosParams.params ?? '[]'}, response ${JSON.stringify(err.response.data)} code: ${err.response.status}`)
                )
            })
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

function initApi(method, methodRequest, params) {
    return new Api({
        run: true,
        method,
        methodRequest,
        params
    });
}

export default initApi