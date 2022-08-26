## Использование

```
import {Api from '@/admin/libs/Api.js'

Api(url, methodRequest, formParams, axiosParams)
  .success((responseDataJson) => {})
  .fail((error) => {})
  .complete((ok, responseDataJson) => {
    if (ok) {}
  })
  .setLoader(vueRefOnCompleteRequest)
  .setErrors(vueRefOnCompleteRequestErrorObject)
  .run()
  
import { sendFile } from '@/admin/libs/Api.js'

sendFile(url, formParams)
  .onUploadProgres()
  .success((responseData) => {})
  .fail((responseData) => {})
  .run()
```