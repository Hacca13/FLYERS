package beans;

public class UtenteBean {

	private int keyUtente;
	private String id;
	private String email;
	private String citta;
	private String password;
	
	
	public UtenteBean(int keyUtente, String id, String email, String citta, String password){
		this.keyUtente = keyUtente;
		this.id = id;
		this.email = email;
		this.citta = citta;
		this.password = password;
	}


	public UtenteBean() {
		// TODO Auto-generated constructor stub
	}


	public int getKeyUtente() {
		return keyUtente;
	}


	public void setKeyUtente(int keyUtente) {
		this.keyUtente = keyUtente;
	}


	public String getId() {
		return id;
	}


	public void setId(String id) {
		this.id = id;
	}


	public String getEmail() {
		return email;
	}


	public void setEmail(String email) {
		this.email = email;
	}


	public String getCitta() {
		return citta;
	}


	public void setCitta(String citta) {
		this.citta = citta;
	}


	public String getPassword() {
		return password;
	}


	public void setPassword(String password) {
		this.password = password;
	}


	@Override
	public String toString() {
		return getClass().getName()+"[keyUtente=" + keyUtente + " id=" + id + " email=" + email + " citta=" + citta
				+ " password=" + password + "]";
	}

	

}