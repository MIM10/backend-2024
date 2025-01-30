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

    static update(id, data) {
        return new Promise((resolve, reject) => {
            const query = `UPDATE students SET nama = ?, nim = ?, email = ?, jurusan = ? WHERE id = ?`;

            db.query(query, [data.nama, data.nim, data.email, data.jurusan, id], (err, result) => {
                if (err) {
                    return reject(err);
                }

                db.query(`SELECT * FROM students WHERE id = ?`, id, (err, result) => {
                    if (err) {
                        return reject(err);
                    }

                    resolve(result[0]);
                });
            });
        });
    }

    static delete(id) {
        return new Promise((resolve, reject) => {
            const selectQuery = `SELECT * FROM students WHERE id = ?`;
            const query = `DELETE FROM students WHERE id = ?`;

            db.query(selectQuery, [id], (err, result) => {
                if (err) {
                    return reject(err);
                }

                if (!result.length) {
                    return reject(new Error('Student tidak ditemukan'));
                }

                const deletedStudent = result[0];

                const deleteQuery = `DELETE FROM students WHERE id = ?`;

                db.query(deleteQuery, [id], (err, deleteResult) => {
                    if (err) {
                        return reject(err);
                    }

                    resolve({ affectedRows: deleteResult.affectedRows, deletedStudent });
                });
            });
        });
    }

    static findByJurusan(jurusan) {
        return new Promise((resolve, reject) => {
            const query = `SELECT * FROM students WHERE jurusan = ?`;
    
            db.query(query, [jurusan], (err, result) => {
                if (err) {
                    return reject(err);
                }
                
                if (result.length === 0) {
                    return reject(new Error('Data tidak ditemukan'));
                }
    
                resolve(result);
            });
        });
    }    
}

module.exports = Student;