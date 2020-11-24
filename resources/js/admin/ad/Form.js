import AppForm from "../app-components/Form/AppForm";

Vue.component("ad-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                page: "",
                direction: ""
            },
            mediaCollections: ["cover"]
        };
    }
});
