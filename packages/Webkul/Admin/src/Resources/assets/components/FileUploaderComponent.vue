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
import {AzureKeyCredential, DocumentAnalysisClient} from "@azure/ai-form-recognizer";

export default {
    components: {
        vueDropzone: vue2Dropzone
    },
    data() {
        return {
            dropzoneOptions: {
                url: "/files",
                addRemoveLinks: true,
                maxFiles: 1,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return file.name;
                },
            },
            fileName: ''
        };
    },
    methods: {
        uploadSuccess(file, response) {
            AnalyseIt(file.name);

            this.fileName = response.file;
        },
        uploadError(file, message) {
            AnalyseIt(file.name);

        },
        fileRemoved() {
        }
    }
};


/*********************************************************************************************************/
/*********************************************************************************************************/


/*
  Remember to remove the key from your code when you're done, and never post it publicly. For production, use
  secure methods to store and access your credentials. For more information, see
  https://docs.microsoft.com/en-us/azure/cognitive-services/cognitive-services-security?tabs=command-line%2Ccsharp#environment-variables-and-application-configuration
*/

const key = "7c492048b7c54f2caf42455ff359f6df";
const endpoint = "https://soom.cognitiveservices.azure.com/";

// sample document
let receiptURL = "https://raw.githubusercontent.com/mohamed-amine-melliti/samples-/main/";
let receiptURL2 = "http://127.0.0.1:8000/files/"

// sample document

async function AnalyseIt(fileName) {

    console.log("AnalyseIt");
    document.getElementById("content").innerHTML = " 👈 👈 Drag and drop your document here !";


    var ret = fileName.replace('undefined', '');
    var re = "";


    receiptURL += ret;
    const client = new DocumentAnalysisClient(endpoint, new AzureKeyCredential(key));

    const poller = await client.beginAnalyzeDocument("prebuilt-invoice", receiptURL);

    const {
        documents: [result]
    } = await poller.pollUntilDone();

    if (result) {
        const invoice = result.fields;

        console.log("Vendor Name:", invoice.VendorName?.content);
        console.log("Customer Name:", invoice.CustomerName?.content);
        console.log("Invoice Date:", invoice.InvoiceDate?.content);



        re += "\n=== Receipt Information ===";
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Vendor Name: </div>" +invoice.VendorName?.content+"</div><br> ";
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Customer Name: </div> " +invoice.CustomerName?.content+"</div><br> ";
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Invoice Date: </div> " +invoice.InvoiceDate?.content+"</div><br> ";

        console.log("Items:");
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Items: </div>" +"</div><br>";


        for (const {
            properties: item
        } of invoice.Items?.values ?? []) {

            console.log("-", item.ProductCode?.content ?? "<no product code>");
            console.log("  Description:", item.Description?.content);
            console.log("  Quantity:", item.Quantity?.content);
            console.log("  Date:", item.Date?.content);
            console.log("  Unit:", item.Unit?.content);
            console.log("  Unit Price:", item.UnitPrice?.content);
            console.log("  Tax:", item.Tax?.content);
            console.log("  Amount:", item.Amount?.content);

            re += "\n/-----------------Item ---------------------------/<br> "+item.id;

            re += "\n<div class=\"custom-attribute-view\"> <div class=\"label\" style='color: red'> Description:</div> " + item.Description?.content +"</div><br>";
            re += "\n<div class=\"custom-attribute-view\"> <div class=\"label\" style='color: red'>Quantity: </div>" +item.Quantity?.content + "</div><br>";
            re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Date: </div> " + item.Date?.content + "</div><br>";



            re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Unit Price: </div> " + item.UnitPrice?.content +"</div><br>";
            re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Amount : </div> " + item.Amount?.content+ "</div><br>";

        }

        console.log("Subtotal:", invoice.SubTotal?.content);
        console.log("Previous Unpaid Balance:", invoice.PreviousUnpaidBalance?.content);
        console.log("Tax:", invoice.TotalTax?.content);
        console.log("Amount Due:", invoice.AmountDue?.content);


        re += "\n/********************** SubTotals **********************/<br>";

        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Subtotal: </div>" +  invoice.SubTotal?.content+ "</div><br>";
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Previous Unpaid Balance: </div> " + invoice.PreviousUnpaidBalance?.content+ "</div><br>";
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Tax total: </div>" + invoice.TotalTax?.content + "</div><br>";
        re += "\n<div class=\"custom-attribute-view\"><div class=\"label\" style='color: red'>Amount Due: </div> " +invoice.AmountDue?.content+ "</div><br>";

        document.getElementById("content").innerHTML = "";


        document.getElementById("content").innerHTML = re;

    } else {
        throw new Error("Expected at least one receipt in the result.");
    }
}

AnalyseIt().catch((error) => {
    console.error("An error occurred: ", error);
});


/*********************************************************************/

</script>
