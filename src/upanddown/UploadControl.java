package upanddown;

import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.nio.file.FileAlreadyExistsException;
import java.nio.file.Files;

import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebInitParam;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;


/**
 * Servlet implementation class UpAndDownControl
 */
@WebServlet(name="/UploadControl" ,urlPatterns="/UploadControl", 
initParams={@WebInitParam(name="files-upload", value="uploads")})
@MultipartConfig(fileSizeThreshold=1024*1024*5,maxFileSize=1024*1024*50, maxRequestSize=1024*1024*50)//max 50 mega

public class UploadControl extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private static String SAVE_DIR="";

	public void init(){
		SAVE_DIR= getServletConfig().getInitParameter("files-upload");
	}

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public UploadControl() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub

		/**Controllo sessione*/
		String action = request.getParameter("action");
		String pathToDB = null;
		if(action!= null && !action.equals("")){

			if(action.equals("upload")){
				String tag1 = request.getParameter("tag1"); /**prende in input i tag da inserire*/
				String tag2 = request.getParameter("tag2");
				String tag3 = request.getParameter("tag3");

				Part fileToUpload = request.getPart("fileToUpload");

				if(fileToUpload!= null && fileToUpload.getSize()!=0){

					String savePath = request.getServletContext().getRealPath("")+SAVE_DIR;

					/*considera la cartella ove è sarà caricato il file*/
					File fileSavePath = new File(savePath);

					if(!fileSavePath.exists()){
						/*crea la cartella se non esiste*/
						fileSavePath.mkdirs(); 
					}

					/**estraggo la string filename = 'nomefile'*/
					String fileNameAndExtension = extractFileName(fileToUpload);
					/**substring per ottenere solo il nome del file*/
					fileNameAndExtension = fileNameAndExtension.substring(fileNameAndExtension.indexOf(File.separator,fileNameAndExtension.lastIndexOf(File.separator))+1, fileNameAndExtension.length());

					try{
						/**definisco dove salvare il file su server*/
						File save = new File(fileSavePath, fileNameAndExtension);

						/**carico il file come stream*/
						InputStream inStream = fileToUpload.getInputStream();

						/*salvataggio*/
						Files.copy(inStream, save.toPath());

						pathToDB = fileSavePath + File.separator + fileNameAndExtension+"-"+tag1;	

					}catch(FileAlreadyExistsException e){

						/*query nel db che conta quante istanze con quel tipo di file ci sono.
						 *SELECT * FROM FILES WHERE TITOLO LIKE +nomefile
						 * aggiungere ('numero') e caricare il file.
						 * 
						 * Oppure lanciare un messaggio di errore con file già esistente.
						 * 
						 * Oppure combinare il nome del file - la sezione e aggiungere + ('numero')
						 * nell'eventualità che già esista.
						 */
					}
				}
			}
		}

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}



	private String extractFileName(Part part){

		String cd=	part.getHeader("content-disposition");
		String[]items=cd.split(";");

		for(String s: items){
			if(s.trim().startsWith("filename")){
				return s.substring(s.indexOf("=")+2,s.length()-1);
			}

		}
		return "";
	}

}
