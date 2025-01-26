const db = require('../config/database');

class Student {
    static all(callback) {
        const query = `SELECT * FROM students`;

        db.query(query, (err, result) => {
            return result;
        });
    }
}

module.exports = Student;