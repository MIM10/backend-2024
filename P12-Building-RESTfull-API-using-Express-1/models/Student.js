const db = require('../config/database');

class Student {
    static all() {
        const query = `SELECT * FROM students`;

        db.query(query, (err, result) => {
            return results;
        });
    }
}

module.exports = Student;