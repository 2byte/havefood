
export const mockFile = function (name, size, mimeType) {
    name = name || "mock.txt";
    size = size || 1024;
    mimeType = mimeType || 'plain/txt';

    function range(count) {
        var output = "";
        for (var i = 0; i < count; i++) {
            output += "a";
        }
        return output;
    }

    var blob = new Blob([range(size)], { type: mimeType });
    blob.lastModifiedDate = new Date();
    blob.name = name;

    return blob;
};