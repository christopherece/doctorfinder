
const specializationAPI = new SpecializationAPI();
const doctorAPI = new DoctorAPI();
const ui = new UI(); 

//Listener for the submit button
document.getElementById('submitBtn').addEventListener('click', (e) => {
    e.preventDefault();

    //get values from the form
    const docName = document.getElementById('doc-name').value;
    const specialization = document.getElementById('specializations').value;

    ui.clearResults();

    if (docName != ''){
        doctorAPI.queryAPI(docName, specialization)
            .then(data => {
                const docLists = data.doctors;
                if(docLists.length > 0 ){
                    ui.displayDoctors(docLists);
                } else {
                    ui.printMessage('No Results Found', 'text-center alert alert-danger mt-4');
                }
            })
    } else {
        doctorAPI.querySpecOnly(specialization)
        .then(data => {
            const docLists = data.doctors;
                if(docLists.length > 0 ){
                    ui.displayDoctors(docLists);
                } else {
                    ui.printMessage('No Results Found', 'text-center alert alert-danger mt-4')

                }
        })
    }
    

});