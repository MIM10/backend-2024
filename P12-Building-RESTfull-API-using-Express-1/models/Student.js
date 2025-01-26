const db = require('../config/database');

class Student {
    static all(callback) {
        return new Promise((resolve, reject) => {
            const query = `SELECT * FROM students`;

            db.query(query, (err, result) => {
                resolve(result);
            });
        });
    }
}

module.exports = Student;