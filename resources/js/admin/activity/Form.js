import AppForm from "../app-components/Form/AppForm";

Vue.component("activity-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                subtitle: this.getLocalizedFormDefaults(),
                body: this.getLocalizedFormDefaults(),
                link: "",
                sortNumber: "",
                fullWidth: false,
                enabled: true,
                textTop: true,
                textDark: true
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
