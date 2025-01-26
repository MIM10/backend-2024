// import express dan routing
const express = require("express");
const student = require("./data/students.js");
const router = require("./routes/api.js")

// membuat object express
const app = express();
const port = 3000

// menggunakan middleware
app.use(express.json());
app.use(express.urlencoded());

// menggunakan routing (router)
app.use(router);

// Mendefinisikan port.
app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});
