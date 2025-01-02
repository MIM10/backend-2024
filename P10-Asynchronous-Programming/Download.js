const download = () => {
    return new Promise((resolve, reject)=> {
        const status = true;

        setTimeout(() => {
            if (status) {
                resolve("Download Selesai.");
            } else {
                reject("Download Gagal.");
            }
        })
    })
}

download()
.then((res) => {
    console.log(res);
})
.catch((err) => {
    console.log(err);
})