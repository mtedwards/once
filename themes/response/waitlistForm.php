  <div class="small-12 columns center">
    <?php the_field('waitlist_message_top'); ?>
    <br><br>
  </div>
  <div class="small-12 medium-8 medium-centered large-6 large-centered columns">
    <form class="custom" method="post" action="http://acmn.pty.mkt3562.com/Once/Website-sidebar" id="waitlistForm">

      <input type="text" name="Firstname" placeholder="First Name" required>
      
      <input type="text" name="Surname"  placeholder="Surname" required>
      
      <input type="Email" name="Email" placeholder="Email" required>
      
      <select class="expand" name="State">
          <option value="" SELECTED >Select one</option>
          <option value="ACT">ACT</option>
          <option value="NSW">NSW</option>
          <option value="NT">NT</option>
          <option value="QLD">QLD</option>
          <option value="SA">SA</option>
          <option value="TAS">TAS</option>
          <option value="VIC">VIC</option>
          <option value="WA">WA</option>
          <option value="New Zealand">New Zealand</option>
          <option value="Overseas">Overseas</option>
          <option value="Other">Other</option>
      </select>
      
      
      
      
      <input type="submit" value="submit" id="waitlistSubmit">
      
      
      <?php $title = get_the_title();
        if($title == 'Sydney') { ?>
        <input type="hidden" name="Sydney" value="Yes">
      <?php    
        } elseif ($title == 'Brisbane') { ?>
        <input type="hidden" name="Brisbane" value="Yes">
      <?php    
        }
      ?>
      
        <input type="hidden" name="2014" id="control_COLUMN81" value="Yes">
        <input type="hidden" name="Once" id="control_COLUMN122" value="Yes">
        <input type="hidden" name="Waitlist" id="control_COLUMN56" value="Yes">
        <input type="hidden" name="formSourceName" value="StandardForm">
        <!-- DO NOT REMOVE HIDDEN FIELD sp_exp -->
        <input type="hidden" name="sp_exp" value="yes">
    
    </form>
  </div>
  <div class="small-12 columns center">
    <?php the_field('waitlist_message_bottom'); ?>
  </div>