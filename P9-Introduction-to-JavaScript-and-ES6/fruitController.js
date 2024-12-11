const fruits = require('./fruits');

const index = () => {
    return fruits;
}

const store = (name) => {
    fruits.push(name);
}

const update = (position, name) => {
    if (isValidPosition(position)) {
        fruits[position] = name;
    }
}

const destroy = (position) => {
    if (isValidPosition(position)) {
        fruits.splice(position, 1);
    }
}

const isValidPosition = (position) => {
    return position >= 0 && position < fruits.length; 
}

module.exports = { index, store, update, destroy };