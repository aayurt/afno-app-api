import AppForm from "../app-components/Form/AppForm";

Vue.component("student-form", {
    mixins: [AppForm],
    props: ["types", "classes"],

    data: function() {
        return {
            form: {
                name: "",
                address: ""
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
