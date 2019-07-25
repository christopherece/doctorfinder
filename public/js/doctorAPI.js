class DoctorAPI {

    //get doctors from API
    async queryAPI(specialization, docName ){
        const appResponse = await fetch(
            `http://localhost:8888/blog/public/api/doctors/${specialization}/${docName}`
        );

        //wait for response return json
        const doctors = await appResponse.json();

        return {
            doctors
        }
    }

    async querySpecOnly(specialization ){
        const appResponse = await fetch(
            `http://localhost:8888/blog/public/api/doctors/${specialization}`
        );

        //wait for response return json
        const doctors = await appResponse.json();

        return {
            doctors
        }
    }
    
}