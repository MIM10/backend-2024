function download() {
    return new Promise((resolve) => {
        setTimeout(() => {
            const result = "Windows-10.exe";
            resolve(result);
        }, 3000);
    });
}

async function showDownload() {
    try {
        const result = await download();
        console.log("Download Selesai");
        console.log("Hasil Download: " + result);
    } catch (error) {
        console.error("Terjadi kesalahan saat download:", error);
    }
}

showDownload();