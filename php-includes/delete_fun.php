<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script type="text/javascript">
function deleteRecordsPin(id)
{ 
  if(confirm("Are you sure you want to delete this record?")==true)
           window.location="manage_pin_release.php?del="+id;
    return false;
}
</script>

</body>
</html>
