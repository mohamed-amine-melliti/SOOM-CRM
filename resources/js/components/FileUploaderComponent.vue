<template>
    <div>
        <vue-dropzone
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            :useCustomSlot="true"
            v-on:vdropzone-success="uploadSuccess"
            v-on:vdropzone-error="uploadError"
            v-on:vdropzone-removed-file="fileRemoved"
        >
            <div class="dropzone-custom-content">
                <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
                <div class="subtitle">...or click to select a file from your computer</div>
            </div>

        </vue-dropzone>
    </div>
</template>



<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    components: {
        vueDropzone: vue2Dropzone
    },
    data() {
        return {
            dropzoneOptions: {
                url: "/files",
                addRemoveLinks: true,
                maxFiles: 1
            },
            fileName: ''
        };
    },
    methods: {
        uploadSuccess(file, response) {
            AnalyseIt();

            console.log('File Successfully Uploaded with file name: ' + response.file);
            this.fileName = response.file;
        },
        uploadError(file, message) {
            AnalyseIt();
            console.log('An Error Occurred12345');

        },
        fileRemoved() {}
    }
};


/*********************************************************************************************************/
/*********************************************************************************************************/

import { DocumentAnalysisClient, AzureKeyCredential }  from "@azure/ai-form-recognizer";

const key = "7c492048b7c54f2caf42455ff359f6df";
const endpoint = "https://soom.cognitiveservices.azure.com/";


// sample document
const receiptURL = "https://github.com/mohamed-amine-melliti/samples-/blob/7fcd21672b62acd99b139969a29cde6fb4614123/sample_1.jpeg"

async function AnalyseIt() {

    const client = new DocumentAnalysisClient(endpoint, new AzureKeyCredential(key));

    const poller = await client.beginAnalyzeDocument("prebuilt-receipt", receiptURL);

    const {
        documents: [result]
    } = await poller.pollUntilDone();

    if (result) {
        const { MerchantName, Items, Total } = result.fields;

        console.log("=== Receipt Information ===");
        console.log("Type:", result.docType);
        console.log("Merchant:", MerchantName && MerchantName.content);

        console.log("Items:");
        for (const item of (Items && Items.values) || []) {
            const { Description, TotalPrice } = item.properties;

            console.log("- Description:", Description && Description.content);
            console.log("  Total Price:", TotalPrice && TotalPrice.content);
        }

        console.log("Total:", Total && Total.content);
    } else {
        throw new Error("Expected at least one receipt in the result.");
    }

}

AnalyseIt().catch((err) => {
    console.error("The sample encountered an error:", err);
});

</script>
