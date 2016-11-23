package upanddown;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.OutputStream;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class DownloadControl
 */
@WebServlet("/DownloadControl")
public class DownloadControl extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DownloadControl() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		String action = request.getParameter("action");
		String pathToDB = null;
		
		if (action.equals("download")){
			response.setContentType("application/x-download");
			/**uso del model(query su DB) per prendere il path del file */

			String pathFile = "C:/Users/Paolo/workspaceProgWeb/.metadata/.plugins/org.eclipse.wst.server.core/tmp0/wtpwebapps/Download&Upload/uploads/lol0.txt";
			response.setHeader("Content-Disposition", "attachment; filename=" + pathFile.substring(pathFile.lastIndexOf("/") + 1));
			int dimFile = 1000000; //cambiare con il db

			File fileToDown = new File(pathFile);

			OutputStream outStream = response.getOutputStream();
			FileInputStream in = new FileInputStream(fileToDown);

			byte[] stream = new byte[dimFile];//da sostituire con la dimensione del file
			int lenght = 0;

			while( (lenght = in.read(stream)) >0){
				outStream.write(stream,0,lenght);
			}

			in.close();
			outStream.close();	
		}
	}
		

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
