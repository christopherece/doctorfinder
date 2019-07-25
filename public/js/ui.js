class UI {
    constructor(){
        this.init();
    }

    init(){
        this.printSpecializations();
        //select result
        this.result = document.getElementById('result');
    }

    //display doctors from API
    displayDoctors(doctors){
        //Build the template
        let htmlTemplate = '';
        
        //Loop Doctors and PRint results
        doctors.forEach(doc => {
            htmlTemplate += `
            
                <div class="col-md-4 mt-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img class="center" src="${doc.img}">
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <h4 class="text-center card-title"> Dr. ${doc.firstname} ${doc.surname}</h4>
                                <div><strong>Specialization:</strong> ${doc.specialization.name}</div>
                                <div><strong>Contact No:</strong> ${doc.contact_no}</div>
                                <a type="button" class="doc-profile btn btn-primary btn-block mt-4" 
                                    data-id="${doc.id}" data-surname="${doc.surname}" 
                                    data-firstname="${doc.firstname}"
                                    data-specialization="${doc.specialization.name}"
                                    data-contact_no="${doc.contact_no}"
                                    data-img="${doc.img}"
                                    data-workhours="${doc.working_hours}"
                                    >Show Profile</a>
                            </div>
                        </div>
                    </div><p></p>
                </div>
                
            `;
        });

        this.showSpinner();
        //after 3 sec print the result
        setTimeout(()=>{
            this.result.innerHTML = htmlTemplate
            //hide spinner
            document.querySelector('.spinner img').remove();

        },3000);


    }

    //print the <options> for the form
        printSpecializations(){
            specializationAPI.getSpecilaizationLists()
                .then(data =>  {
                    const specializations = data.specializations;
                    console.log(specializations);

                    //build the select from rest api
                    const select = document.getElementById('specializations');
                    specializations.forEach(specialization => {
                        // add options
                        const option = document.createElement('option');
                        option.value = specialization.id;
                        option.appendChild(document.createTextNode(specialization.name));

                        select.appendChild(option);
                    });


                })
                .catch(error => console.log(error));
                
        }

        //display Messages
        printMessage(message, className){
            //create div
            const div = document.createElement('div');
            div.className = className;
            //add the text
            div.appendChild(document.createTextNode(message));


            //insert into the html
            const searchDiv = document.querySelector('#search-doctor');
            searchDiv.appendChild(div);

            //remove after 3 seconds
            setTimeout(()=> {
                this.removeMessage();
            }, 3000);

        }

        //remove warning message
        removeMessage(){
            const alert = document.querySelector('.alert');
            const existing = document.querySelector('#result');
            
            if(alert){
                alert.remove();
            }
        }

        //show Spinner
        showSpinner(){
            const spinnerGIF = document.createElement('img');
            spinnerGIF.src = 'img/spinner.gif';
            document.querySelector('.spinner').appendChild(spinnerGIF);
        }

        //clear previous search
        clearResults(){
            const resultsDiv = document.querySelector('#result');
            resultsDiv.innerHTML = ''
        }



}