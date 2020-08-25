<?php
// Folder Path: \MyLaravel\resources\views

// Try code below with the following path
// param?value=<script>alert('hi');</script>

echo htmlspecialchars($value, ENT_COMPAT); // Safer
// echo $value; // Not so safe

// Note: Use {!! $value !!} to NOT escape data.
?>

<!--  Escape data. Safe (uncomment below) -->
<!-- {{ $value }} -->
  

