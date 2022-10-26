const start = () =>{
    console.log('Load JS')

    const btn = document.getElementById('saveBtn')
    btn.onclick = saveBtnEvent
}

const saveBtnEvent = e =>{
    const form = () =>  document.querySelector("#stud")
    form.onsubmit = e => {
        var nick =  document.querySelector("#name").value
        console.log(nick)
     
        if(nick === ''){
         e.preventDefault()
         document.getElementById("alert").innerHTML = "<p>Error it is necessary to replace the name field</p>"
         return
        }
      }
}



 