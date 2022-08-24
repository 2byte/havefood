import { Api, sendFile, urlAdminApi, default as createRequestApi } from "@/admin/libs/Api.js";
import { mockFile } from "../utils.js";
import axios from 'axios'

describe("Testing class resources/scripts/libs/Api.js", function () {
  
  it.only('Api authenticatation user', async () => {
    
    const apiBoss = await Api.authenticatedBoss()
    
    expect(apiBoss).toBe(createRequestApi)
    
    const reqGoodsTypes = apiBoss('/different/get-goods-types')
    
    reqGoodsTypes.success((data) => {
      expect(data.length).toBeGreaterThan(0)
    })
    
    await reqGoodsTypes.getPromise()
    
    expect.assertions(2)
  }, 10000)
  
  it("send file", async () => {
    const files = new FormData();
    files.append("files", mockFile("image.jpg", 200 * 1024, "image/jpeg"));

    const sender = sendFile("file/upload", { files });

    console.log("api base url", sender.apiBaseUrl);

    try {
      await sender.getPromise();
    } catch (err) {
      console.dir(err);
    }

    sender.complete((ok, data) => {
      console.log(ok, data);
      test.todo(ok, data);

      expect(ok).toBeTrue();
    });

    //expect.assertions(1)
  }, 5000);
});
