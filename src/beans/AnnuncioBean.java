package beans;

import java.util.Collection;
import java.sql.Date;

public class AnnuncioBean {
	
	private int keyAnnuncio;
	private String titolo;
	private String descrizione;
	private String contatto;
	private Date dataDiCaricamento;
	private Collection<TagBean> tagsOfAnnuncio;
	private int keyUtente;
	
	
	public AnnuncioBean(){
		
	}
	
	public AnnuncioBean(int keyAnnuncio, String titolo, String descrizione, String contatto, Date dataDiCaricamento,
			Collection<TagBean> tagsOfAnnuncio, int keyUtente) {
		this.keyAnnuncio = keyAnnuncio;
		this.titolo = titolo;
		this.descrizione = descrizione;
		this.contatto = contatto;
		this.dataDiCaricamento = dataDiCaricamento;
		this.tagsOfAnnuncio = tagsOfAnnuncio;
		this.keyUtente = keyUtente;
	}
 
	
	
	
	
	
	public int getKeyAnnuncio() {
		return keyAnnuncio;
	}

	public void setKeyAnnuncio(int keyAnnuncio) {
		this.keyAnnuncio = keyAnnuncio;
	}

	public String getTitolo() {
		return titolo;
	}

	public void setTitolo(String titolo) {
		this.titolo = titolo;
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

	public Collection<TagBean> getTagsOfAnnuncio() {
		return tagsOfAnnuncio;
	}

	public void setTagsOfAnnuncio(Collection<TagBean> tagsOfAnnuncio) {
		this.tagsOfAnnuncio = tagsOfAnnuncio;
	}

	public String getContatto() {
		return contatto;
	}

	public void setContatto(String contatto) {
		this.contatto = contatto;
	}
	
	
	@Override
	public String toString() {
		return this.getClass() +" [keyAnnuncio=" + keyAnnuncio + ", titolo=" + titolo + ", descrizione=" + descrizione
				+ ", contatto=" + contatto + ", dataDiCaricamento=" + dataDiCaricamento + ", tagsOfAnnuncio="
				+ tagsOfAnnuncio + ", keyUtente=" + keyUtente + "]";
	}

	
}
