<?php
namespace backend\modules\user\components;

use Yii;

/*****************Usage for Yii2Advanced*****************************
1.	Put this file to Your project/common/components (create components directory by user)

2. Update main config
	'components' => [
		.....
        'ldap' => [
            'class' => 'common\components\Ldap',
        ],
        .....
    ],

3. Update function validatePassword (Your project/common/models/LoginForm.php)

	public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $ldap = Yii::$app->ldap;
            $ldap->server = ['dc2.psu.ac.th','dc7.psu.ac.th','dc1.psu.ac.th'];
            $ldap->basedn = 'dc=psu,dc=ac,dc=th';
            $ldap->domain = 'psu.ac.th';
            $ldap->username = $this->username;
            $ldap->password = $this->password;
            $authen = $ldap->Authenticate();
            if(!$user || !$authen['status']){
                $this->addError($attribute, 'Incorrect username or password.');
            }else{
                //Yii::$app->session['userInfo'] = $authen['info']; //Register Session
            }
        }
    }

***************************************************/

class Ldap
{
	public $server = '';
	public $port = 389;
	public $basedn = '';
	public $domain = '';
	public $username = '';
	public $password = '';

	public function Authenticate()
	{
		$auth_status = false;
		$i=0;
		while(($i<count($this->server))&&($auth_status==false)){
			//$ldap = ldap_connect("ldaps://".$server[$i]) or $auth_status = false;
			$ldap = ldap_connect($this->server[$i], $this->port) or $auth_status = false;
			ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
			ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
			if(@ldap_bind($ldap, $this->username.'@'.$this->domain,$this->password)){
				if(empty($this->password)){
					$auth_status = false;
				}else{
					$result = [
						'status' => true,
						'info' =>self::UserInfo($ldap),
					];
					$auth_status = true;
				}
			}else{
				$result = [
					'status' => false,
				];
			}
			ldap_close($ldap);
			$i++;
		}
		return $result;
	}

	public function UserInfo($ldap)
	{
		$sr=ldap_search(
			$ldap,
			$this->basedn,
			"(&(objectClass=user)(objectCategory=person)(sAMAccountName=".$this->username."))",
			array("cn", "dn", "samaccountname", "employeeid", "citizenid", "company", "campusid", "department", "departmentid", "physicaldeliveryofficename", "positionid", "description", "displayname", "title", "personaltitle", "personaltitleid", "givenname", "sn", "sex", "userprincipalname","mail")
		);

		$info = ldap_get_entries($ldap, $sr);

		$user = [
			'cn' => $info[0]["cn"][0],
			'dn' => $info[0]["dn"],
			'accountname' => $info[0]["samaccountname"][0],
			'personid' => $info[0]["employeeid"][0],
			'citizenid' => $info[0]["citizenid"][0],
			'campus' => $info[0]["company"][0],
			'campusid' => $info[0]["campusid"][0],
			'department' => $info[0]["department"][0],
			'departmentid' => $info[0]["departmentid"][0],
			'workdetail' => $info[0]["physicaldeliveryofficename"][0],
			'positionid' => $info[0]["positionid"][0],
			'description' => $info[0]["description"][0],
			'displayname' => $info[0]["displayname"][0],
			'detail' => $info[0]["title"][0],
			'title' => $info[0]["personaltitle"][0],
			'titleid' => $info[0]["personaltitleid"][0],
			'firstname' => $info[0]["givenname"][0],
			'lastname' => $info[0]["sn"][0],
			'sex' => $info[0]["sex"][0],
			'mail' => $info[0]["userprincipalname"][0],
			'othermail' => $info[0]["mail"][0],
		];

		return $user;
		//return $info; //for original information server call back
	}
}
