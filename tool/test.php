<?
          $user = "hieu.huynh";
          $pass = "123456@X";
          $ldap_dn1 = "CN=Not Remove,OU=upsharework.com,DC=upsharework,DC=com";
          $ldap_password1 = "123456789@X";
          $ldap_host = "192.168.100.71";
        
          $ldap_con = ldap_connect($ldap_host);
          ldap_set_option ($ldap_con, LDAP_OPT_REFERRALS, 0);
          ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        
          if($bind = ldap_bind($ldap_con,$ldap_dn1,$ldap_password1)){
            $filter = "(samaccountname=".$user.")";
            $result = ldap_search($ldap_con,"OU=upsharework.com,DC=upsharework,DC=com",$filter) or exit("Unable to search");
            if(!$result){
            $entries = ldap_get_entries($ldap_con, $result);
            $userDN = $entries[0]["name"][0];  
          }else { return false;}
            $ldap_dn = "CN=".$userDN .",OU=upsharework.com,DC=upsharework,DC=com";
            $ldap_password = $pass;
        
            if($bind1 = ldap_bind($ldap_con,$ldap_dn,$ldap_password)){
                      echo "Hello ". $userDN ;
                      ldap_unbind($ldap_con);
                      return true;
            }else {
              return false;
            }
          }else
            echo ldap_error($ldap_con);
?>