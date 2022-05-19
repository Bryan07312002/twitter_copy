import axios from 'axios';

export const Request =(to, method, args) =>{
    let user = JSON.parse(localStorage.getItem("User"))
    let url = 'http://localhost:8000/api/'

    if(user){
        console.log(user)
        axios.defaults.headers.common["Authorization"] = "Bearer " + user.token;
    }
    
    const response = axios({
        method: method,
        url: url + to,
        data: args
    });
    return response
};