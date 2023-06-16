const addForm = document.getElementById("add-user-form");
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
const tbody = document.querySelector("tbody");

addForm.addEventListener("submit", async (e)=>{
    e.preventDefault();

    const formData = new FormData(addForm);
    formData.append("add", 1);

    if(addForm.checkValidity() === false){
        e.preventDefault();
        e.stopPropagation();
        addForm.classList.add("was-validated");
        return false;
    }else{
        document.getElementById("add-user-btn").value ="Please wait...";

        const data = await fetch("action.php", {
            method : "POST",
            body : formData
        })
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById("add-user-btn").value = "Add User";
        addForm.reset();
        addForm.classList.remove("was-validated");
        addModal.hide();
        fetchAllUsers();
    }
})

const fetchAllUsers = async () =>{
    const data = await fetch("action.php?read=1",{
        method : "GET"
    })
    const response = await data.text();
    tbody.innerHTML = response;
}
fetchAllUsers();