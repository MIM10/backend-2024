const Persiapan = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("Mempersiapkan Bahan....");
        }, 3000);
    })
};

const rebusAir = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("Mempersiapkan....");
        }, 7000);
    })
};

const masak = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("Memmasak mie....");
        }, 5000);
    })
};

module.exports = {Persiapan, rebusAir, masak};