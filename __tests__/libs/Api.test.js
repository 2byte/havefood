import { sendFile } from "@/admin/libs/Api.js";
import { mockFile } from "../utils.js";
import axios from 'axios'

describe("Testing class resources/scripts/libs/Api.js", function () {
  
  it.only('Api authenticatation user', async () => {
    
    const req = axios({
      baseURL: 'http://127.0.0.1:8005'
    })
    
    req.get('sanctum/csrf-cookie').then((res) => {
      console.log(res)
    });
  }, 3000)
  
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
