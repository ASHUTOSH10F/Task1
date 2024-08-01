function sendMail()
{
    var params  = 
    {
        name : document.getElementById("name").value,
        email : document.getElementById("email").value,
        message : document.getElementById("message").value
    }
    const serviceID  = "service_upstksz";
const  templateID ="template_w01bpzg"

document.getElementById("loader").style.display = 'block';


emailjs.
send(serviceID, templateID,params)
.then((res) =>{
    document.getElementById("name").value="";
    document.getElementById("email").value="";
    document.getElementById("message").value="";
    document.getElementById("loader").style.display = 'none';
    alert("We Will Shortlly Connect With You")
})
.catch((err) => {
    console.log(err);

    // Hide the loader in case of error
    document.getElementById("loader").style.display = 'none';
});
}

