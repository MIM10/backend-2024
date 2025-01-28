const db = require('../config/database');

class Student {
    static all() {
        return new Promise((resolve, reject) => {
            const query = `SELECT * FROM students`;

            db.query(query, (err, result) => {
                resolve(result);
            });
        });
    }

    static find(id) {
        return new Promise((resolve, reject) => {
            const query = `SELECT * FROM students WHERE id = ?`;

            db.query(query, [id], (err, result) => {
                if (result.length) {
                    resolve(result[0]);
                } else {
                    reject(new Error('Data not found'));
                }
            });
        });
    }

    static create(data) {
        return new Promise((resolve, reject) => {
            const query = `INSERT INTO students (nama, nim, email, jurusan) VALUES (?, ?, ?, ?)`;

            db.query(query, [data.nama, data.nim, data.email, data.jurusan], (err, result) => {
                if (err) {
                    return reject(err);
                }

                db.query(`SELECT * FROM students WHERE id = ?`, result.insertId, (err, result) => {
                    if (err) {
                        return reject(err);
                    }

                    resolve(result[0]);
                });
            });
        });
    }
}

module.exports = Student;