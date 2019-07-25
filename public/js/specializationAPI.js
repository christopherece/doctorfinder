class SpecializationAPI {
    //get all specialization
    async getSpecilaizationLists(){
        const url = await fetch('http://localhost:8888/blog/public/api/specializations');

        //return as json
        const specializations = await url.json();
        //return object
        return {
            specializations
        }
    }
}