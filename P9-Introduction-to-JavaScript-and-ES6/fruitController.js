const fruits = require(`./fruits`);

const index = () => {
    for (const fruit of fruits) {
        console.log(`- ${fruit}`);
    }
}

const store = (name) => {
    console.log(`\nMethod store - Menambahkan buah ${name}`);
    fruits.push(name);
    index();
}

const update = (position, name) => {
    console.log(`\nMethod update - Update data ${position} menjadi ${name}`);
    if (isValidPosition(position)) {
        fruits[position] = name;
    }
    index();
}

const destroy = (position) => {
    console.log(`\nMethod destroy - Menghapus data ${position}`);
    if (isValidPosition(position)) {
        fruits.splice(position, 1);
    }
    index();
}

const isValidPosition = (position) => {
    return position >= 0 && position < fruits.length; 
}

module.exports = { index, store, update, destroy };