import {
  Api,
  sendFile,
  urlAdminApi,
  default as createRequestApi,
} from "@/admin/libs/Api.js";
import { mockFile } from "../utils.js";
import axios from "axios";
import fs from "fs";

describe("Testing class resources/scripts/libs/Api.js", function () {
  it("Api authenticatation user", async () => {
    const apiBoss = await Api.authenticatedBoss();

    expect(apiBoss).toBe(createRequestApi);

    const reqGoodsTypes = apiBoss("/different/get-goods-types");

    reqGoodsTypes.success((data) => {
      expect(data.length).toBeGreaterThan(0);
    });

    await reqGoodsTypes.getPromise();

    expect.assertions(2);
  }, 10000);

  it.only("send file", async () => {
    const fields = {
      //files: mockFile("image.jpg", 200 * 1024, "image/jpeg"),
      model: "goods",
    };

    var form = new window.FormData();
    form.append("model", "goods");
    form.append("files[]", mockFile("image.jpg", 200 * 1024, "image/jpeg"));
    
    /*const form = {
      model: 'goods',
      files: mockFile("image.jpg", 200 * 1024, "image/jpeg")
    }*/
    
    const sender = await sendFile("file/upload", form)
      .onUploadProgress((ev) => {
        test.todo(ev, ev.loaded, ev.total);
        console.log(ev, ev.loaded, ev.total);
      })
      .complete((ok, data) => {
        console.log(ok, data);
        test.todo(ok, data);

        expect(ok).toBeTruthy();
      })
      .fail((err) => {
        console.dir(err);
      })
      .run();

    expect.assertions(1);
  }, 8000);

});
