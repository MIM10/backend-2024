const {Persiapan, rebusAir, masak} = require("./Persiapan");

// Problem in Asynchronous
// const main = () => {
//    console.log("Problem in Asynchronous:");
   
//     Persiapan();
//     rebusAir();
//     masak();
// }

// Solution with Callback
// const main = () => {
//     console.log("Solution with Callback:");
    
//     setTimeout(() => {
//         Persiapan();

//         setTimeout(() => {
//             rebusAir();

//             setTimeout(() => {
//                 masak();
//             }, 5000)
//         }, 7000)
//     }, 3000)
// }


// Solution with Promise
const main = () => {
    Persiapan()
        .then((res) => {
            console.log(res);
            return rebusAir();
        })
        .then((res) => {
            console.log(res);
            return masak();
        })
        .then((res) => {
            console.log(res);
        })
}
main();