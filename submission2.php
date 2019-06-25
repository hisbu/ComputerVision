<?php
/**----------------------------------------------------------------------------------
* Microsoft Developer & Platform Evangelism
*
* Copyright (c) Microsoft Corporation. All rights reserved.
*
* THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND, 
* EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES 
* OF MERCHANTABILITY AND/OR FITNESS FOR A PARTICULAR PURPOSE.
*----------------------------------------------------------------------------------
* The example companies, organizations, products, domain names,
* e-mail addresses, logos, people, places, and events depicted
* herein are fictitious.  No association with any real company,
* organization, product, domain name, email address, logo, person,
* places, or events is intended or should be inferred.
*----------------------------------------------------------------------------------
**/

/** -------------------------------------------------------------
# Azure Storage Blob Sample - Demonstrate how to use the Blob Storage service. 
# Blob storage stores unstructured data such as text, binary data, documents or media files. 
# Blobs can be accessed from anywhere in the world via HTTP or HTTPS. 
#
# Documentation References: 
#  - Associated Article - https://docs.microsoft.com/en-us/azure/storage/blobs/storage-quickstart-blobs-php 
#  - What is a Storage Account - http://azure.microsoft.com/en-us/documentation/articles/storage-whatis-account/ 
#  - Getting Started with Blobs - https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-blobs/
#  - Blob Service Concepts - http://msdn.microsoft.com/en-us/library/dd179376.aspx 
#  - Blob Service REST API - http://msdn.microsoft.com/en-us/library/dd135733.aspx 
#  - Blob Service PHP API - https://github.com/Azure/azure-storage-php
#  - Storage Emulator - http://azure.microsoft.com/en-us/documentation/articles/storage-use-emulator/ 
#
**/

require_once 'vendor/autoload.php';
require_once "./random_string.php";

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=sasubmission2;AccountKey=sA5z8JfobVlRoE5HtvXvF1uQb42rchBZm+Yx88IFhlCSj8diwDllxgNJRmcJif9zmqC+WkWwlgLJruWOMw5apQ==";

// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);

// $fileToUpload = "";

// if (!isset($_GET["Cleanup"])) {
    // Create container options object.
    // $createContainerOptions = new CreateContainerOptions();

    // Set public access policy. Possible values are
    // PublicAccessType::CONTAINER_AND_BLOBS and PublicAccessType::BLOBS_ONLY.
    // CONTAINER_AND_BLOBS:
    // Specifies full public read access for container and blob data.
    // proxys can enumerate blobs within the container via anonymous
    // request, but cannot enumerate containers within the storage account.
    //
    // BLOBS_ONLY:
    // Specifies public read access for blobs. Blob data within this
    // container can be read via anonymous request, but container data is not
    // available. proxys cannot enumerate blobs within the container via
    // anonymous request.
    // If this value is not specified in the request, container data is
    // private to the account owner.
    // $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

    // Set container metadata.
    // $createContainerOptions->addMetaData("key1", "value1");
    // $createContainerOptions->addMetaData("key2", "value2");

      $containerName = "hisbusubmission2";

    // try {
        // Create container.
        // $blobClient->createContainer($containerName, $createContainerOptions);

        // Getting local file so that we can upload it to Azure
        if (isset($_POST['submit'])) {
            // $blobClient->deleteContainer($_GET["containerName"]);
            $fileToUpload = strtolower($_FILES["fileToUpload"]["name"]);
            $content = fopen($_FILES["fileToUpload"]["tmp_name"], "r");
            $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
            $count=sizeof($result->getBlobs());
            $fileNameToUpload = $count++.$_FILES["fileToUpload"]["name"];
            // echo $fileToUpload;
        // $myfile = fopen($fileToUpload, "w") or die("Unable to open file!");
        // fclose($myfile);
        
        # Upload file as a block blob
        // echo "Uploading BlockBlob: ".PHP_EOL;
        // echo $fileToUpload;
        // echo "<br />";
        
            // $content = fopen($fileToUpload, "r");

            //Upload blob
            // if(sizeof($result)<1){
                $blobClient->createBlockBlob($containerName, $fileNameToUpload, $content);
                header("Location: submission2.php");
            // }else{
               
            // }
        }
        // List blobs.
        $listBlobsOptions = new ListBlobsOptions();
        $listBlobsOptions->setPrefix("");
        $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
        // echo "These are the blobs present in the container: ";

        // do{
        //     $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
        //     foreach ($result->getBlobs() as $blob)
        //     {
        //         echo $blob->getName().": ".$blob->getUrl()."<br />";
        //     }
        
        //     $listBlobsOptions->setContinuationToken($result->getContinuationToken());
        // } while($result->getContinuationToken());
        // echo "<br />";

        // Get blob.
        // echo "This is the content of the blob uploaded: ";
        // $blob = $blobClient->getBlob($containerName, $fileToUpload);
        // fpassthru($blob->getContentStream());
        // echo "<br />";
    // }
    // catch(ServiceException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
    //     $code = $e->getCode();
    //     $error_message = $e->getMessage();
    //     echo $code.": ".$error_message."<br />";
    // }
    // catch(InvalidArgumentTypeException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
//         $code = $e->getCode();
//         $error_message = $e->getMessage();
//         echo $code.": ".$error_message."<br />";
//     }
// } 
// else 
// {

    // try{
        // Delete container.
    //     echo "Deleting Container".PHP_EOL;
    //     echo $_GET["containerName"].PHP_EOL;
    //     echo "<br />";
    //     $blobClient->deleteContainer($_GET["containerName"]);
    // }
    // catch(ServiceException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
//         $code = $e->getCode();
//         $error_message = $e->getMessage();
//         echo $code.": ".$error_message."<br />";
//     }
// }
?>

<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>submision2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .kotak{
            border: 1px solid green;
            border-radius: 5px;
        }
        </style>
  </head>
<body>
		<!-- <div role="main" class="container">
        <h1 style="text-align:center">Analisa gambar dengan Azure Computer Vision</h1><hr>
            <div class=" kotak">
                <div class="d-flex kotak">
                    <div class="col-md-2 kotak a">
                        <p class="lead">Pilih gambar </p>
                        <span class="border-top my-3"></span>
                    </div>
                    <div class="mt-4 col-mb-8">
                        <form class="form-group" action="submission2.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" accept=".jpeg,.jpg,.png" required="">
                            <input type="submit" name="submit" value="Upload" onclick="processImage()">
                        </form>
                    </div>
                </div>
            </div> -->

    <div role="main" class="container">
        <h1 style="text-align:center">Analisa gambar dengan Azure Computer Vision</h1><hr>
        <div class="row kotak justify-content-center">
            <div class="mt-4 col-mb-8">
                <form class="form-group" action="submission2.php" method="post" enctype="multipart/form-data">
                    <label class="lead" >Pilih gambar untuk dianalisa : </label>
                    <input type="file" name="fileToUpload" accept=".jpeg,.jpg,.png" required="" class="file">
                    <input type="submit" name="submit" value="Upload" onclick="" class="btn btn-primary">
                </form>
            </div>
        </div>          
    </div>
    <div class="container mt-2">
        <div class="d-flex ">
            <div class="col-md-6 ">
                <table class="table table-hover w-100" >
                    <thead class="thead thead-dark">
                        <tr >
                            <td>Nama</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $urlImage='';
                            $no=1;
                            do {
                                foreach ($result->getBlobs() as $blob)
                                {
                                $urlImage = $blob->getUrl()
                        ?>
                        
                        <?php
                                    // echo $no+=1;
                                }
                                $listBlobsOptions->setContinuationToken($result->getContinuationToken());
                            } while($result->getContinuationToken());
                            // echo $urlImage
                            ?>
                            <tr>
                                <td><?php echo  $blob->getName() ?><p id="xurlFile" style="display: none"><?php echo $blob->getUrl()?></p></td>
                                <!-- <script>var urltest= document.getElementById("urlFile").innerHTML; console.log(<?php echo json_encode($blob->getUrl); ?>)</script>         -->
                                <td><input type="submit" class="btn btn-success" onclick="processImage(<?php json_encode($no++)?>)" value="Analisa"></td>
                            </tr>
                        <p id="urlFile" style="display: none"><?php echo $urlImage?></p>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 kotak">
                <div id="imageDiv" style="display:table-cell;">
                    Source image:
                    <br><br>
                    <img id="sourceImage" width="100%" />
                    <hr><h3 id="description" style="text-align:center"></h3>
                </div>                
            </div>
        </div>
    </div>
		<!-- <h4>Total Files : <?php echo sizeof($result->getBlobs())?></h4> -->
            
        <!-- <div id="wrapper" style="width:1020px; display:table;">
            <div id="jsonOutput" style="width:600px; display:table-cell;">
                Response:
                <br><br>
                <textarea id="responseTextArea" class="UIInput"
                        style="width:580px; height:400px;"></textarea>
            </div>
            <div id="imageDiv" style="width:420px; display:table-cell;">
                Source image:
                <br><br>
                <img id="sourceImage" width="400" />
                <h3 id="description">Loading . .</h3>
            </div>
        </div> -->

    <!-- </div> -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <!-- <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script> -->
  </body>

  <script type="text/javascript">
  
    function processImage(url) {
        // **********************************************
        // *** Update or verify the following values. ***
        // **********************************************
 
        // Replace <Subscription Key> with your valid subscription key.
        var subscriptionKey = "7b2646f19b1748088a39e4c860a48f0f";
 
        // You must use the same Azure region in your REST API method as you used to
        // get your subscription keys. For example, if you got your subscription keys
        // from the West US region, replace "westcentralus" in the URL
        // below with "westus".
        //
        // Free trial subscription keys are generated in the "westus" region.
        // If you use a free trial subscription key, you shouldn't need to change
        // this region.
        var uriBase =
            "https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/analyze";
 
        // Request parameters.
        var params = {
            "visualFeatures": "Categories,Description,Color",
            "details": "",
            "language": "en",
        };
 
        // Display the image.
        // var urlsource = url
        var sourceImageUrl = document.getElementById("urlFile").innerHTML;
        // var sourceImageUrl = url;
        // alert("test" + sourceImageUrl)
        document.querySelector("#sourceImage").src = sourceImageUrl;
        console.log(url, sourceImageUrl)
        // Make the REST API call.
        $.ajax({
            url: uriBase + "?" + $.param(params),
 
            // Request headers.
            beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader(
                    "Ocp-Apim-Subscription-Key", subscriptionKey);
            },
 
            type: "POST",
 
            // Request body.
            data: '{"url": ' + '"' + sourceImageUrl + '"}',
        })
 
        .done(function(data) {
            // Show formatted JSON on webpage.
            $("#responseTextArea").val(JSON.stringify(data, null, 2));
            $("#description").text(data.description.captions[0].text);
        })
 
        .fail(function(jqXHR, textStatus, errorThrown) {
            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " :
                errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" :
                jQuery.parseJSON(jqXHR.responseText).message;
            alert(errorString);
        });
    };
    // processImage()
</script>
</html>