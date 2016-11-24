package beans;

import java.util.Date;

public class AnnuncioBean {
	
	private int keyAnnuncio;
	private String nome;
	private String descrizione;
	private Date dataDiCaricamento;
	private int keyUtente;
	
	public  AnnuncioBean(int keyAnnuncio, String nome, String descrizione, Date dataDiCaricamento, int keyUtente){
		this.keyAnnuncio = keyAnnuncio;
		this.nome = nome;
		this.descrizione = descrizione;
		this.dataDiCaricamento = dataDiCaricamento;
		this.keyUtente = keyUtente;
	}

	public int getKeyAnnuncio() {
		return keyAnnuncio;
	}

	public void setKeyAnnuncio(int keyAnnuncio) {
		this.keyAnnuncio = keyAnnuncio;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getDescrizione() {
		return descrizione;
	}

	public void setDescrizione(String descrizione) {
		this.descrizione = descrizione;
	}

	public Date getDataDiCaricamento() {
		return dataDiCaricamento;
	}

	public void setDataDiCaricamento(Date dataDiCaricamento) {
		this.dataDiCaricamento = dataDiCaricamento;
	}

	public int getKeyUtente() {
		return keyUtente;
	}

	public void setKeyUtente(int keyUtente) {
		this.keyUtente = keyUtente;
	}

	@Override
	public String toString() {
		return getClass().getName()+"[keyAnnuncio=" + keyAnnuncio + ", nome=" + nome + ", descrizione=" + descrizione
				+ ", dataDiCaricamento=" + dataDiCaricamento + ", keyUtente=" + keyUtente + "]";
	}
	
	
	
	
	
	
}
