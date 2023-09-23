import AppForm from "../app-components/Form/AppForm";

Vue.component("archive-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title: "",
                body: "",
                archive_subcategory_id: "",
                enabled: false,
                public: false
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
