const addForm = document.getElementById("add-user-form");
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
const tbody = document.querySelector("tbody");
const updateForm = document.getElementById("edit-user-form");
const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
// const generatePdfBtn = document.getElementById("generate-pdf-btn");

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

// edit
tbody.addEventListener("click", (e) =>{
    if(e.target && e.target.matches("a.editlink")){
        e.preventDefault();
        let id = e.target.getAttribute("id");
        editUser(id);
    }
})

const editUser = async (id) =>{
    const data = await fetch(`action.php?edit=1&id=${id}`,{
        method: "GET"
    })
    const response = await data.json();
    document.getElementById("id").value = response.id;
    document.getElementById("username").value = response.username;
    document.getElementById("phone").value = response.phone;
    document.getElementById("room").value = response.room;
    document.getElementById("room_bill").value = response.room_bill;
    document.getElementById("electricity_bill").value = response.electricity_bill;
    document.getElementById("water_bill").value = response.water_bill;
    document.getElementById("parking_fee").value = response.parking_fee;
}

updateForm.addEventListener("submit", async (e) =>{
    e.preventDefault();

    const formData = new FormData(updateForm);
    formData.append("update", 1);

    if(updateForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("edit-user-btn").value = "Please Wait...";

        const data = await fetch("action.php", {
            method: "POST",
            body: formData
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById("edit-user-btn").value = "Edit User";
        updateForm.reset();
        updateForm.classList.remove("was-validated");
        editModal.hide();
        fetchAllUsers();
    }
});

// c
// generatePdfBtn.addEventListener("click", () => {
//     generatePdf();
// });

// const generatePdf = async () => {
//     const data = await fetch("action.php?pdf=1", {
//         method: "GET"
//     });
//     // Handle the response or any error if needed
//     // For example, you can open the generated PDF in a new tab
//     window.open(data.url, "_blank");
// };

// delete
tbody.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.deletelink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id");
        deleteUser(id);
    }
});

const deleteUser = async (id) => {
    const data = await fetch(`action.php?delete=1&id=${id}`, {
        method: "GET"
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllUsers();
}
