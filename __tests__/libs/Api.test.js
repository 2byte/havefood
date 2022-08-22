import { sendFile } from "@/admin/libs/Api.js";

describe("Testing class resources/scripts/libs/Api.js", function () {
  it("send file", () => {
    
    const files = new FormData()
    
    sendFile("file/upload", {files});
  });
});
