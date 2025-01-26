// import express dan routing
const express = require("express");
const router = require("./routes/api.js");

// membuat object express
const app = express();
const { APP_PORT } = process.env;

// menggunakan middleware
app.use(express.json());
app.use(express.urlencoded());

// menggunakan routing (router)
app.use(router);

// Mendefinisikan port.
app.listen(APP_PORT, () => {
    console.log(`Server running at: http://localhost:${APP_PORT}/`);
});
