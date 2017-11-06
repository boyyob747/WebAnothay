
<div class="container-fluid col-md-8">
  <div class="panel panel-primary" >
    <div class="panel-heading text-left panel-relative"><h2>Dách sách câu hỏi : </h2></div>
  <div class="panel-body ">
         <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/inline/ckeditor.js"></script>
         <h1>Inline editor</h1>
   <div id="editor">
       <p>This is some sample content.</p>
   </div>
   <script>
       InlineEditor
           .create( document.querySelector( '#editor' ) )
           .catch( error => {
               console.error( error );
           } );
   </script>
      </div>
    </div>
</div>
