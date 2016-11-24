package beans;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Date;

public class FileBean {
	
	private int keyFile;
	private String nome;
	private String descrizione;
	private double raiting;
	private Collection<TagBean> tagsOfFile;
	private Date dataDiCaricamento; /*controllare struttura su vecchi progetti*/
	private int keyUtente; /*può variare*/


	public FileBean(int keyFile, String nome, String descrizione, Date dataDiCaricamento, double raiting, int keyUtente){
		this.keyFile = keyFile;
		this.nome = nome;
		this.descrizione = descrizione;
		this.dataDiCaricamento = dataDiCaricamento;	
		this.raiting = raiting;
		this.keyUtente = keyUtente;
		tagsOfFile = new ArrayList<TagBean>();
	}
	
	public int getKeyFile(){
		return keyFile;
	}
	
	public void setKeyFile(int keyFile){
		this.keyFile = keyFile;
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
	
	public double getRaiting() {
		return (double)raiting;
	}

	public void setRaiting(double raiting) {
		this.raiting = raiting;
	}

	public int getKeyUtente() {
		return keyUtente;
	}

	public void setKeyUtente(int keyUtente) {
		this.keyUtente = keyUtente;
	}

	public Collection<TagBean> getTagsOfFile(){
		Collection<TagBean> copy = new ArrayList<TagBean>();

		for(TagBean t : tagsOfFile){
			copy.add(t);
		}

		return copy;
	}

	public void addTag(TagBean tag){
		tagsOfFile.add(tag);
	}

	public boolean removeTag(TagBean tag){
		tagsOfFile.remove(tag);
		return true;
	}

	public int getNumberOfTag(){
		return tagsOfFile.size(); 
	}
	
	@Override
	public String toString(){
		return getClass().getName()+"[keyFile="+keyFile+" nome="+nome+" descrizione="+descrizione+" dataDiCaricamento="+dataDiCaricamento
				+" raiting="+raiting+" keyUtente="+keyUtente+" tagsOfFile="+tagsOfFile.toString()+"]";
	}
}