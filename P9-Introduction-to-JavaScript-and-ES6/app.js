const { index, store, update, destroy } = require('./fruitController');

const main = () => {
    console.log('Method index - Menampilkan buah');
    console.log(index());

    console.log('\nMethod store - Menambahkan buah Strawberry');
    store('Strawberry');
    console.log(index());

    console.log('\nMethod update - Update data 0 menjadi Kedondong');
    update(0, 'Kedondong');
    console.log(index());

    console.log('\nMethod destroy - Menghapus data 0');
    destroy(0);
    console.log(index());
};

main();