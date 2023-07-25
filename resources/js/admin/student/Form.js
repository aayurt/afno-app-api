import AppForm from "../app-components/Form/AppForm";

Vue.component("student-form", {
    mixins: [AppForm],
    props: ["classes", "types"],
    data: function() {
        return {
            form: {
                name: "",
                ordination_name: "",
                address: "",
                dob: "",
                gender: "",
                email: "",
                phone_no: "",
                roll_no: "",
                student_type_id: "",
                student_class_id: ""
            }
        };
    }
});
