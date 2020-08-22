import AppForm from "../app-components/Form/AppForm";

Vue.component("author-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name: this.getLocalizedFormDefaults()
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
